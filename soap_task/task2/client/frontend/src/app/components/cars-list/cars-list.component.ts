import { Component, OnInit } from '@angular/core';
import { CarsService } from '../../services/api/cars/cars.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cars-list',
  templateUrl: './cars-list.component.html',
  styleUrls: ['./cars-list.component.css']
})
export class CarsListComponent implements OnInit {
  
  list = new Array();
  isFilter = false;

  constructor( private _api:CarsService,  private _router: Router) { }
  
  load() {
    this._api.getShortList().subscribe(resp => {
      this.list = resp;
    });
  }
  
  click(item)
  {
    this._router.navigate(['/car/'+item.id]);
  }

  ngOnInit() {
    this.load();
  }
  
  isDetail()
  {
    if(this.list.length>0)
    {
      if(this.list[0]['engine'])
      {
        return true;
      }
    }
    return false;
  }
  
  onFilter(data)
  {
    this._api.getCarFilter(data).subscribe(resp => {      
      this.list = resp;
    });
  }

}
