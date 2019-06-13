import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from '../components/home/home.component';
import { CarDetailComponent } from '../components/car-detail/car-detail.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'car/:id', component: CarDetailComponent },
  { path: '**', redirectTo: '' }
];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forRoot(routes, { useHash: true }),
  ],
  declarations: [],
  exports: [RouterModule]
})
export class RoutingModule { }