import { Component, OnInit } from '@angular/core';
import { Bathroom } from './bathroom';
import { BathroomService } from './bathroom.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})


export class AppComponent implements OnInit{
  bathrooms: Bathroom[];
  error = '';
  success = '';
  title = 'Flushd';
        
  constructor(private bathroomService: BathroomService) {
  }
        
  ngOnInit() {
    this.getBathrooms();
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
