import { AuthRoutes } from './auth.routing';
import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RegisterComponent } from './components/register/register.component';


@NgModule({
  declarations: [
    RegisterComponent,
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(AuthRoutes)
  ],
  exports:[]
})
export class AuthModule { }
