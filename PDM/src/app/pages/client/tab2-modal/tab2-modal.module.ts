import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { Tab2ModalPageRoutingModule } from './tab2-modal-routing.module';

import { Tab2ModalPage } from './tab2-modal.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    Tab2ModalPageRoutingModule
  ],
  declarations: [Tab2ModalPage]
})
export class Tab2ModalPageModule {}
