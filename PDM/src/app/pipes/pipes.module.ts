import { NgModule } from '@angular/core';
import {FilterPipe} from './filter.pipe';
import { TextPipe } from './text.pipe';
@NgModule({
  declarations: [FilterPipe,TextPipe],
  exports: [FilterPipe,TextPipe]
})
export class PipesModule { }
