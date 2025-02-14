---
title: "About MutableCreationOptionsInterface"
author: "Danny"
date: "2018-10-15 20:34:59"

image: "images/og-images/about-mutable-creation-options-interface.jpg"

ogImage:
    title: "About MutableCreationOptionsInterface"
    subtitle: "Providing contextual options"
    imageUrl: "https://avatars.githubusercontent.com/u/618940?s=36"
    fileName: "about-mutable-creation-options-interface"
---
Recently I got a bit stuck when I started to implement some basic input filters which would save a lot of boiler plate code in our REST API. Continuously we were injecting the entity access services into our REST API resources. Where some resources would offer an entity having over more than five relations to other entities.

This led me down the path to start looking into alternatives approaches and how to increase the reusability of the code base. Quite quickly the path of implementing custom filters that would transform a numerical identifier into an entity using the access layer seemed a logical approach. Validation of the item could be resolved with a [InstanceOf](https://github.com/zendframework/zend-validator/blob/master/src/IsInstanceOf.php) validator to check the object type to be of the correct type. Using this approach would offer the referenced object as part of the request validation and resulting in a slimmer resource controller as we would no longer get the entity using the access layer in the controller.

Next hurdle was to inject the access layer into the newly written filter. Luckily Zend Framework offers the [factory pattern](https://designpatternsphp.readthedocs.io/en/latest/Creational/FactoryMethod/README.html) in the form of the FactoryInterface as well as the ServiceLocatorInterface.

However, certain filters would need some contextual options which up until now the project never required. As this is not possible using a plain factory I searched through the Zend Framework documentation and sources. The solution was found in the the MutableCreationOptionsInterface interface, which adds the public function setCreationOptions that will be invoked before calling the createService method. Making the contextual options available when creating the filter.

So how does it all tie together when written code:

```php
// Filepath: ./module/App/src/Filter/Factory/UserFilterFactory

namespace App\Filter\Factory\UserFilterFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\MutableCreationOptionsInterface;
use Zend\ServiceManager\MutableCreationOptionsTrait;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use App\Filter\UserFilter;

class UserFilterFactory implements FactoryInterface, MutableCreationOptionsInterface
{
    use MutableCreationOptionsTrait; // [tl! highlight]
    
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dependencyA = $serviceLocator->get(\App\DependancyA);
        $dependencyB = $serviceLocator->get(\App\DependancyA);
        $filter = new UserFilter($dependencyA, $dependencyB);
        
        $filter->setOptions($this->creationOptions); // [tl! highlight]

        return $filter;
    }
}
```    

_Small note, the MutableCreationOptionsInterface has been removed in Zend Framework 3 as the options now can be passed directly through the factory_