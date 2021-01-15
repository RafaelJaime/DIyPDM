import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { Tab2ModalPage } from './tab2-modal.page';

const routes: Routes = [
  {
    path: '',
    component: Tab2ModalPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class Tab2ModalPageRoutingModule {}
