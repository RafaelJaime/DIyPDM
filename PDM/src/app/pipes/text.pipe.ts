import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'text'
})
export class TextPipe implements PipeTransform {

  transform(text: string): unknown {
    if (text.length>= 100) {
      return text;
    }
    return null;
  }

}
