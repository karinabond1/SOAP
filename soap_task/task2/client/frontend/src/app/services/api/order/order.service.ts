import { Injectable } from '@angular/core';
import { ApiService } from '../api/api.service';
import { Observable } from 'rxjs/Observable';

@Injectable({
  providedIn: 'root'
})
export class OrderService {

   constructor(private _apiService: ApiService) { }
  
  Order(order): Observable<any> {
    return this._apiService.post(`/order`,order);
  }
}
