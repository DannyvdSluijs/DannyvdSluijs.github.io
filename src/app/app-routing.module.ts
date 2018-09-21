import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import {SocialMediaComponent} from './social-media/social-media.component';
import {LandingComponent} from './landing/landing.component';

const routes: Routes = [
    { path: '', redirectTo: '/landing', pathMatch: 'full' },
    { path: 'landing', component: LandingComponent },
    { path: 'social-media', component: SocialMediaComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [ RouterModule ]
})
export class AppRoutingModule { }
