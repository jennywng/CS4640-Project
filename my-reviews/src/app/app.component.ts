import { Component, OnInit } from '@angular/core';
import { Bathroom } from './bathroom';
import { BathroomService } from './bathroom.service';

import {Review} from './reviews'

import { Reviewer} from './reviewers';
import { CookieService} from 'ngx-cookie-service';
// import { CookieService } from 'angular2-cookie/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [CookieService]
})


export class AppComponent implements OnInit{
  bathrooms: Bathroom[];
  error = '';
  success = '';
  title = 'Flushd';
  myData: Object;
  otherData: Object;

  reviews: string;

  myReviews: Review[] = [];

        
  constructor(private bathroomService: BathroomService, private http: HttpClient, private cookieService: CookieService) {
  }
        
  ngOnInit() {
    // this.getBathrooms();
    let id = this.getUserCookie();
    console.log('id from cookie: ', id);
    this.getMyReviews(id);
    // this.parseData();
  }

  getUserCookie() {
    return this.cookieService.get('uid');
  }

  getMyReviews(data): void {
    this.http.get('http://localhost/CS4640-Project/php/get-my-reviews.php?uid='+ data).subscribe((data) => {
        console.log("Got data from backend", data);
        this.reviews = JSON.stringify(data);

        // console.log(JSON.parse(this.reviews));
        this.myData = data;

        let json = JSON.parse(JSON.stringify(data));

        console.log(json);

        json.my_reviews.forEach(e => {
          let r = new Review();
          r.id = e.id; r.bID = e.bID; r.uID = e.bID; r.title = e.title; 
          r.rDesc = e.rDesc; r.rating = e.rating; 
          if (e.imgURL) {
            r.img = 'http://localhost/CS4640-Project/' + e.imgURL;
          } else {
            r.img = null;
          }
          this.myReviews.push(r);
        });
        return this.myReviews;
    }, (error) => {
      console.log('Error', error);
    })
  }



  getOtherReview(data): void {
    console.log(data);
    let params = JSON.stringify(data);
    this.http.post('http://localhost/CS4640-Project/php/get-other-reviews.php', data).subscribe((data) => {
      console.log('Other review data: ', data);
      this.otherData = data;

    }, (error) => {
      console.log('Error', error);
    })
  }



        
  getBathrooms(): void {
    this.bathroomService.getAll().subscribe(
      (res: Bathroom[]) => {
        this.bathrooms = res;
      },
      (err) => {
        this.error = err;
      }
    );
  }
}
