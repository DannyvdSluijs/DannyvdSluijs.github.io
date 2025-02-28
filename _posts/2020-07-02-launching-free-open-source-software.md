---
title: "Launching free open-source software"
description: "What does it all take to launch your open-source software?"
author: "Danny"
date: "2020-07-02"

#image: "images/og-images/figuring-ou-how-parallel-processing-works-in-php.jpg"

ogImage:
    title: "Launching free open-source software"
    subtitle: "What does it all take to launch your open-source software?"
    imageUrl: "https://avatars.githubusercontent.com/u/618940?s=36"
    fileName: "launching-free-open-source-software"
---

As developers, we all use some free open-source software (FOSS) in some form or another, and we take it for granted. 
But what does it all take to launch your open-source software? I felt the PHP community something was missing a piece 
of open-source software which acts as a configurable library to map JSON API responses to your internal PHP objects. 
In this blog, I will tell you about launching my open-source project and my learnings along the way. The main focus 
will be on the bits and pieces that are not related to writing code.

## Explore your idea

No matter how small an idea or the feeling of something missing use a way custom to you to explore your idea. You can 
plant the idea in your brain and see what comes out of it, you can go full-blown software architect on it, or you can 
do as I did and use a small mindmap app to explore your idea whenever you feel like it. It is also worth taking the 
time to explore [GitHub](http://github.com/) or your package manager of choice and see if there already is somebody that had the same idea 
and is offering his solution as an open-source package. This could save you quite some time and allow you to move on 
to your next idea.

## Create your walking skeleton

Before launching your open-source software it is going to need code. Don’t worry too much about the quality just start 
and create a walking skeleton to make your idea come to life. Later on, you can improve upon and add stuff such as 
testing, code quality tools, and CI/CD.

## Launching your project

> Well ahh... I've put it out there on GitHub and anybody can download it and send me a pull request! I'm done.

Sorry to say but making your source code available to other developers doesn’t count as launching a project. At first, 
I had no clue how to approach this and what should be part of it and what should not. Searching for input and resources 
I came across the website https://opensource.guide which is part of GitHub and is a very good resource to get started. 
After reading through the guides I quickly realized launching your open-source software is like starting your own company. 
You’ll need to make up the rules, it needs marketing and talks about your “product”. The next chapters are items I’ve 
applied with to my project, some with good results others with fewer results.

### Pick the correct license

This maybe is the only really important thing to take care of and that is choosing the correct license for your project. 
After carelessly picking GNU GPLv3 I was made aware by one of my colleagues it was too restrictive and the MIT license 
would be a much better fit. Again after doing some more research on the internet, I found https://choosealicense.com 
(again another website by GitHub) which can help you in picking the right license for your open-source project.

### Add a friendly introduction

You should welcome people that take the effort to look at your project and one of the quickest ways to do so is by 
adding a README.md to the root of your project. A proper readme should provide a clear and quick view of what it is the 
project does and why that is helpful. And secondly, it should tell you how to get started and where to find help. 
Here you should already become the marketeer of your project. Try to explain it in layman’s terms as the people you are 
trying to speak to might not be that deep into the tech of what it is your project does.

### Create a project website (optional)

If you want to create a more comprehensive explanation, or you need more than an individual page to build up from the 
small building block to the more complex logic of your software project it might be helpful to launch a project website. 
With the help of GitHub pages, this can be achieved at zero cost and minimal effort. The website for JsonMapper was 
created using Jekyll and Tailwind to build a static site from a couple of Markdown files. In total this has cost me 
two evenings to get a basic site up and running. The only money I’ve spent so far is $12 for a custom domain name which 
can easily be set up in the GitHub pages settings of your repository, and they even give you a free SSL certificate.

### Going the extra mile

As you can see the intent is to help people once they have found your project, such as providing them with a friendly 
welcome and point them in the right direction. There are some extra things you could consider to set up for your project, 
which are:

- **Setup GitHub issue templates** to help guide people to provide the correct information when reporting an issue. This will help you understand the problems they run into better.
- **Adding a Code of conduct** that states the people have to be respectful to each other to create a safe place to participate in FOSS. This will show that you are commited to create a healthy environment and value integrity.
- **Add a Contribution guidelines document** _(CONTRIBUTING.md)_ which tells something about the type of help your seeking for the project. if you are passionate about the backend but lack some frontend skills, tell them. There might be someone with a love for frontend who is willing to help. Such a document would also be an ideal place to describe how a PR would be checked. This informs people upfront what to expect when sending that pull request.
- **Brand your project**. Depending on the level of professionalism of your project you might want to create a logo to be used in the README.md, project website, and on social media. This will make it easier for people to remember and/or recognize your project.
- **Claim your social media spot**. This item like the one before all depends on how professional you want to go about with your project. Claiming the username on social media only is a 5-minute job and ensures nobody could claim it for you.
- **Be exemplary** and apply your project to a little skeleton project. This again is only to help others that come across your project one way or the other and show them how your project is intended to be used.

## Telling the world about your software

So now we get into the scary part: the actual launching of your software. Agreed it isn’t as exciting as the launch of
the Crew Dragon by SpaceX, but exciting nonetheless. You should be prepared for feedback by your audience so pick them 
wisely. For me, I decided to slowly increase the number of people I would reach and started with the people that I know
are passionate about code.

Every second Friday of the month we have a “Show and Tell” which is basically an open stage with my colleagues as an 
audience. From there I moved to some tweets, which have little yield if you’re not having that many followers. I 
decided to take the plunge and collect feedback on Reddit. I was prepared for hard critique and not so friendly words. 
What I actually received was nice comments, 20 additional stars on my project, and I was even made aware of similar 
libraries which I had not heard of before. This let to extra work into JsonMapper and see if the other libraries 
were actually doing the same or worse doing more.

To grow your community, you'll need to keep telling about it. You could consider writing a blog about it or even attend 
a local meetup or conference and do a lighting talk about your project. You could even outright ask people to follow 
you on Twitter or star your project during such talk. This could help your project grow.

## What is next?

As fellow developers know software is never ready. If you want to make your open-source software thrives you’ll need to 
keep doing some basic maintenance to keep up to date with your dependencies and language upgrades. In due time your 
project hopefully attracts some pull-requests or issues reported. Try and respond timely, explaining to the author what 
they can expect. You can inform them your week is busy and you’re planning to take a look next week or later if needed. 
This is a decent way to manage expectations from the people that took the effort to help you and hopefully motivates 
them to help you or others again.

If you feel the project is growing over your head, try and see if you are having one or two persons that have made 
multiple contributions and if they would become interested to become an official contributor to the project. As an 
easier alternative, you could explore some automation tools that can handle repetitive tasks such as there are 
[Dependabot](https://dependabot.com/), [Mergify](https://mergify.io/), [Autoresponder](https://github.com/probot/autoresponder), 
and [Reminders](https://github.com/probot/reminders). [Probot](https://probot.github.io/apps/) offers a long list of 
apps that can be your little helpers.

When the project really becomes booming, and you would like to spend more time on your software project but your 
financial situation doesn’t allow for it you could always consider different funding options. GitHub started this back 
in 2019 offering monthly payments to support your favorite free open-source software. This does require the additional 
paperwork.

## Wrapping up

All in all, there is quite some work if you really want your free open-source software to get an audience. It will be 
hard at times, and you should expect a few bumps along the road. It even might not catch on at all, or you will find 
there are competitors to your idea. Probably the work will never be done, so if you want to make it a success be very 
sure you are committed.

If this blog post made you curious about the results you can check them out at https://github.com/JsonMapper/JsonMapper 
and give the project a star or follow [@JsonMapper](https://twitter.com/JsonMapper) on Twitter to keep you updated with 
the project.

P.S. JsonMapper has been made possible by Infi allowing me to work during my work hours on personal improvement and 
supporting this type of initiative.