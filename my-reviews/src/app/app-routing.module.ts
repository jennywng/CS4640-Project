import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ReviewsComponent } from './reviews/reviews.component';
import { BathroomsComponent } from './bathrooms/bathrooms.component';

const routes: Routes = [
  {path: '', redirectTo: '/reviews', pathMatch: 'full'},
  {path: 'reviews', component: ReviewsComponent},
  {path: 'bathroomform', component: BathroomsComponent}
]


@NgModule({
  exports: [ RouterModule ],
  imports: [ RouterModule.forRoot(routes)],
})
export class AppRoutingModule {}