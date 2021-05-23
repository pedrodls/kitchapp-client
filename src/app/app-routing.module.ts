import { FrontofficeModule } from './frontoffice/frontoffice.module';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [];

@NgModule({
  imports: [
    RouterModule.forRoot(routes),
    FrontofficeModule
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule { }
