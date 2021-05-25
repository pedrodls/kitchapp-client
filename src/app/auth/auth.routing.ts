import { RegisterComponent } from './components/register/register.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

export const AuthRoutes: Routes = [
  //{path:'login', component: LoginComponent},
  {path:'register', component: RegisterComponent}
];
