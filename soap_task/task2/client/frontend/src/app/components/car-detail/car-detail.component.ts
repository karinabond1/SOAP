import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { CarsService } from '../../services/api/cars/cars.service';

@Component({
  selector: 'app-car-detail',
  templateUrl: './car-detail.component.html',
  styleUrls: ['./car-detail.component.css']
})
export class CarDetailComponent implements OnInit {
  
  car = <any>{};

  constructor(
  private _api:CarsService,
  private _route: ActivatedRoute 
  ) { }

  ngOnInit() {
    let id = this._route.snapshot.paramMap.get('id');
    this._api.getById(id).subscribe(resp => {
      this.car = resp;
    });
  }

}
