import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { ReviewsComponent } from './reviews/reviews.component';
import { BathroomsComponent } from './bathrooms/bathrooms.component';

@NgModule({
  declarations: [
    AppComponent,
    ReviewsComponent,
    BathroomsComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }


