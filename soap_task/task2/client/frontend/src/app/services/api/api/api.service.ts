import { Injectable, Optional } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import {ToastrService} from 'ngx-toastr';
import { environment } from '../../../../environments/environment';

@Injectable()
export class ApiService {

  private API_URL = environment.apiUrl;

  constructor(
    private http: HttpClient,
    private toast: ToastrService
  ) {    
  }

  private setHeaders(): HttpHeaders {
    let headersConfig = {};

    return new HttpHeaders(headersConfig);
  }

  get(path: string): Observable<any> {
    return this.http.get(`${this.API_URL}${path}`, { headers: this.setHeaders() })
      .catch((error: HttpResponse<any>) => this.formatErrors(error));
  }

  getBlob(path: string): Observable<any> {
    return this.http.get(`${this.API_URL}${path}`, { headers: this.setHeaders(), responseType: 'blob'})
      .catch((error: HttpResponse<any>) => this.formatErrors(error));
  }

  post(path: string, body: Object = {}): Observable<any> {
    return this.http.post(`${this.API_URL}${path}`, body, { headers: this.setHeaders() })
      .catch((error: HttpResponse<any>) => this.formatErrors(error));
  }

  private formatErrors(error: HttpResponse<any>) {   
    if (error.status === 401) {
      this.toast.error('Ви не авторизовані!', 'Помилка');
    } else if (error.status === 403) {
      this.toast.error('Доступ заборонено', 'Помилка');
    } else if (error.status === 415) {
      this.toast.error('Тип файлу не підтримується', 'Помилка');
    } else if (error.status === 500) {
      this.toast.error('Внутрішня помилка серверу', 'Помилка');
    } else  if (error.status === 404) {
      this.toast.error('Сторінку не знайдено', 'Помилка');
    } else {
      this.toast.error('Невідома', 'Помилка');
    }
    console.error(error.status);
    return Observable.throw(error.status);
  }


}