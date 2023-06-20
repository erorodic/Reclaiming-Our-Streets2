/**
 * 'Reclaiming Our Streets'
 * 
 *  A TypeScript project to explore and promote safe, healthy, and vibrant streets for people of all ages. 
 */

//Base Imports
import {Component, OnInit, ChangeDetectionStrategy, Input, Output, EventEmitter} from '@angular/core';
import {FormGroup, FormBuilder, Validators} from '@angular/forms';
//Utility Imports
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { BehaviorSubject } from 'rxjs';
//Data Imports
import {ReclaimingOurStreetsDataService} from '../../services/reclaiming-our-streets-data.service';
import {ReclaimingOurStreetsData} from '../../model/reclaiming-our-streets-data';
//Components Imports
import {ReclaimingOurStreetsDataFormComponent} from './reclaiming-our-streets-data-form/reclaiming-our-streets-data-form.component';

@Component({
    selector: 'ReclaimingOurStreets',
    templateUrl: './reclaiming-our-streets.component.html',
    styleUrls: ['./reclaiming-our-streets.component.css'],
    changeDetection: ChangeDetectionStrategy.OnPush
})
export class ReclaimingOurStreetsComponent implements OnInit {
    // Input Properties
    @Input() public title: string;
    @Input() public description: string;
    @Input() public itemsPerPage: number;
    @Input() public page: number;
    // Outputs
    @Output() public pageChange: EventEmitter<number> = new EventEmitter<number>();
    // Local State
    public reclaimingOurStreetsData: ReclaimingOurStreetsData[];
    public isLoading: boolean;
    public loadingError: any;
    // Form
    public form: FormGroup;
    public formErrors: any;
    public formSubmitted: boolean;
    private formBuilder = new FormBuilder();
    // Data Services
    private dataService: ReclaimingOurStreetsDataService;
    // Dialog 
    private dialog: MatDialog;

    constructor(reclaimingOurStreetsDataService: ReclaimingOurStreetsDataService, dialog: MatDialog) {
        this.dataService = reclaimingOurStreetsDataService;
        this.dialog = dialog;
        this.reclaimingOurStreetsData = [];
        this.isLoading = false;
        this.loadingError = null;
        this.form = this.formBuilder.group({
            mapType: ['', Validators.required],
            filterText: ['', Validators.required],
        });
        this.formErrors = {
            mapType: {},
            filterText: {},
        };
        this.formSubmitted = false;
    }

    ngOnInit() {
        this.fetchData();
    }

    private fetchData() {
        this.isLoading = true;
        this.dataService.getData()
            .subscribe(
                data => { this.onDataFetched(data); },
                error => { this.onDataFetchError(error); }
            );
    }

    private onDataFetched(data: ReclaimingOurStreetsData[]) {
        console.log('ReclaimingOurStreetsData: ', data);
        this.isLoading = false;
        this.loadingError = null;
        this.reclaimingOurStreetsData = data;
    }

    private onDataFetchError(error: any) {
        console.log('ReclaimingOurStreetsData Error: ', error);
        this.isLoading = false;
        this.loadingError = error;
        this.reclaimingOurStreetsData = [];
    }

    public onPageChange(pageNumber: number) {
        this.pageChange.emit(pageNumber);
    }

    public onFilterTextChange() {
        this.fetchData();
    }

    public onMapTypeChange() {
        this.fetchData();
    }

    public onDataFormSubmit() {
        this.formSubmitted = true;
        // validate form
        if (this.form.invalid) {
            return;
        }
        this.fetchData();
    }

    public openDataFormDialog() {
        const dialogRef = this.dialog.open(ReclaimingOurStreetsDataFormComponent, {
            width: '600px',
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result) {
                this.fetchData();
            }
        });
    }

}