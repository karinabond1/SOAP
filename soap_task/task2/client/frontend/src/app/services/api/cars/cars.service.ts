import { Injectable } from '@angular/core';
import { ApiService } from '../api/api.service';
import { Observable } from 'rxjs/Observable';

@Injectable({
  providedIn: 'root'
})
export class CarsService {
  
   constructor(private _apiService: ApiService) { }
  
  getShortList(): Observable<any[]> {
    return this._apiService.get(`/shortlist`);
  }
  
  getById(id): Observable<any> {
    return this._apiService.post(`/cardetail`,{id});
  }
  
  getCarFilter(data): Observable<any> {
    return this._apiService.post(`/carfilter`,data);
  }
}
