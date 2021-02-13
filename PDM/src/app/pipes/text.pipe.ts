import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'text'
})
export class TextPipe implements PipeTransform {

  transform(value: string, state: boolean): any {
    if (state) {
      return value.slice(0,100) + " show more...";
    } else {
      return value + " show less...";
    }
  }

}
