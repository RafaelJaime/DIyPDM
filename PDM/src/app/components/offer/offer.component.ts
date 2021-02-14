import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-offer',
  templateUrl: './offer.component.html',
  styleUrls: ['./offer.component.scss'],
})
export class OfferComponent implements OnInit {

  @Input() offer: any;

  constructor() { }

  ngOnInit() {}

}
