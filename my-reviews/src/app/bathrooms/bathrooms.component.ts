import { Component, OnInit } from '@angular/core';
import { Bathroom } from '../bathroom';
import { BathroomService } from '../bathroom.service';

import {Review} from '../reviews'

import { Reviewer} from '../reviewers';
import { CookieService} from 'ngx-cookie-service';
// import { CookieService } from 'angular2-cookie/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';


@Component({
  selector: 'app-bathrooms',
  templateUrl: './bathrooms.component.html',
  styleUrls: ['./bathrooms.component.css']
})
export class BathroomsComponent implements OnInit {

  bathroomModel = new Bathroom();
  message: object;

  constructor(private http: HttpClient) { }

  ngOnInit() {
  }



  sendBathroomData(data) {
    console.log(data);
    this.http.post('http://localhost/CS4640-Project/php/new-bathroom.php', data).subscribe((data) => {
      this.message = data;
      console.log(this.message);
    }, (error) => {
      console.log('Error: ', error);
    });
  }


  // getOtherReview(data): void {
  //   console.log(data);
  //   let params = JSON.stringify(data);
  //   this.http.post('http://localhost/CS4640-Project/php/get-other-reviews.php', data).subscribe((data) => {
  //     this.message = data;
  //   }, (error) => {
  //     console.log('Error', error);
  //   })
  // }

}
