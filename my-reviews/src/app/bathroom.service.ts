import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

import { Observable, throwError } from 'rxjs';
import { map, catchError } from 'rxjs/operators';

import { Bathroom } from './bathroom';

@Injectable({
  providedIn: 'root'
})


export class BathroomService {
  baseUrl = 'http://localhost/api';
  bathrooms: Bathroom[];
  constructor(private http: HttpClient) { }

  getAll(): Observable<Bathroom[]> {
    return this.http.get(`${this.baseUrl}/list`).pipe(
      map((res) => {
        this.bathrooms = res['data'];
        return this.bathrooms;
    }),
    catchError(this.handleError));
  }

  private handleError(error: HttpErrorResponse) {
    console.log(error);
   
    // return an observable with a user friendly message
    return throwError('Error! something went wrong.');
  }

}
