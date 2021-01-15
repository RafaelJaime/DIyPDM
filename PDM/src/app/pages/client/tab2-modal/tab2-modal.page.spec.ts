import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { Tab2ModalPage } from './tab2-modal.page';

describe('Tab2ModalPage', () => {
  let component: Tab2ModalPage;
  let fixture: ComponentFixture<Tab2ModalPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Tab2ModalPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(Tab2ModalPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
