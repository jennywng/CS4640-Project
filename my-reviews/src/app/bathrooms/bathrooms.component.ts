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

  constructor() { }

  ngOnInit() {
  }

  sendBathroomData(data) {

  }

}
