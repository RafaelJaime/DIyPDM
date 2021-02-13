import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'text'
})
export class TextPipe implements PipeTransform {

  transform(text: string): any {
    let newString: any;
    if (text.length>= 100) {
      newString = text.slice(0, 100) + " " + "showMore...";
    }
    return newString;
  }

}
