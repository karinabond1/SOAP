import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-car-filter',
  templateUrl: './car-filter.component.html',
  styleUrls: ['./car-filter.component.css']
})
export class CarFilterComponent implements OnInit {
  
  @Output() onFilter = new EventEmitter();
  
  filter = <any>{};

  constructor() { }

  ngOnInit() {
  }
  
  Filtered()
  {
    this.onFilter.emit(this.filter);
  }

}
