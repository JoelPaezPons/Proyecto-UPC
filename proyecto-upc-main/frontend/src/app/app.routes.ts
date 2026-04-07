import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { SatelliteComponent } from './components/satellite/satellite.component';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { SignInComponent } from './components/sign-in/sign-in.component';
import { SignUpComponent } from './components/sign-up/sign-up.component';

export const routes: Routes = [
    {path: 'home', component: HomeComponent},
    {path: 'satellite', component: SatelliteComponent},
    {path: 'about-us', component: AboutUsComponent},
    {path: 'sign-in', component: SignInComponent},
    {path: 'sign-up', component: SignUpComponent},
    { path: '', redirectTo: 'home', pathMatch: 'full' },
    {path: '**', component: HomeComponent},
];
