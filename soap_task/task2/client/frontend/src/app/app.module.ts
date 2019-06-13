import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule, HttpClient, HttpXhrBackend } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { NoopAnimationsModule } from '@angular/platform-browser/animations';

import {ToastrModule} from 'ngx-toastr';

import { RoutingModule } from './routing/routing.module';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';

import { ApiService } from './services/api/api/api.service';
import { CarsService } from './services/api/cars/cars.service';
import { OrderService } from './services/api/order/order.service';
import { CarsListComponent } from './components/cars-list/cars-list.component';
import { CarDetailComponent } from './components/car-detail/car-detail.component';
import { OrderComponent } from './components/order/order.component';
import { CarFilterComponent } from './components/car-filter/car-filter.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    CarsListComponent,
    CarDetailComponent,
    OrderComponent,
    CarFilterComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    CommonModule,
    RoutingModule,
    NoopAnimationsModule,
    ToastrModule.forRoot({
      timeOut: 10000,
      positionClass: 'toast-bottom-right',
      preventDuplicates: true,
    }),
  ],
  providers: [
    ApiService,
    CarsService,
    OrderService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
