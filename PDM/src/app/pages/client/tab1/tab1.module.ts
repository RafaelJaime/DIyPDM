import { IonicModule } from '@ionic/angular';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Tab1Page } from './tab1.page';

import { Tab1PageRoutingModule } from './tab1-routing.module';
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
    Tab1PageRoutingModule,
    HeaderModule,
    PipesModule,
    ComponentsModule
  ],
  declarations: [Tab1Page]
})
export class Tab1PageModule {}
