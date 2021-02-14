import { IonicModule } from '@ionic/angular';
import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Tab2Page } from './tab2.page';
import { Tab2PageRoutingModule } from './tab2-routing.module';
import { ExploreContainerComponentModule } from 'src/app/explore-container/explore-container.module';
import { HeaderModule } from 'src/app/components/header/header.module';
import { PipesModule } from 'src/app/pipes/pipes.module';
import { ComponentsModule } from "../../../components/components.module";

@NgModule({
  imports: [
    IonicModule,
    CommonModule,
    FormsModule,
    ExploreContainerComponentModule,
    Tab2PageRoutingModule,
    HeaderModule,
    PipesModule,
    ComponentsModule
  ],
  declarations: [Tab2Page]
})
export class Tab2PageModule {}
