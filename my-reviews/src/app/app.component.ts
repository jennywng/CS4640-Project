import { Component, OnInit } from '@angular/core';



import {Review} from './reviews'

import { CookieService} from 'ngx-cookie-service';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  
  // getBathrooms(): void {
  //   this.bathroomService.getAll().subscribe(
  //     (res: Bathroom[]) => {
  //       this.bathrooms = res;
  //     },
  //     (err) => {
  //       this.error = err;
  //     }
  //   );
  // }
}
