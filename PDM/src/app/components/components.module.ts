import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IonicModule } from '@ionic/angular';

import { ArticleComponent } from './article/article.component';
import { ArticlesComponent } from './articles/articles.component';

import { OfferComponent } from './offer/offer.component';
import { OffersComponent } from './offers/offers.component';


@NgModule({
  declarations: [
    ArticleComponent,
    ArticlesComponent,
    OfferComponent,
    OffersComponent
  ],
  imports: [
    CommonModule,
    IonicModule
  ],
  exports: [
    ArticlesComponent,
    OffersComponent
  ]
})
export class ComponentsModule { }
