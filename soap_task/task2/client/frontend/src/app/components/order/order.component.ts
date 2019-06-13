import { Component, OnInit, Input } from '@angular/core';
import { OrderService } from '../../services/api/order/order.service';
import {ToastrService} from 'ngx-toastr';

@Component({
  selector: 'app-order',
  templateUrl: './order.component.html',
  styleUrls: ['./order.component.css']
})
export class OrderComponent implements OnInit {
  
   @Input() carid: number;
  
  order = <any>{
    idcar: this.carid,
    payment: "credit card"
  };

  constructor(
  private _api:OrderService,
   private toast: ToastrService
  ) { }

  ngOnInit() {
  }
  
  onOrder() {
    this.order.idcar = this.carid;
    
    this._api.Order(this.order).subscribe(() =>{
      this.toast.success('Успішно!', 'Замовлення');
    });
    
  }

}
