//
//  CreatedJobViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface CreatedJobViewController : UITableViewController

@property (nonatomic, strong) NSMutableArray *jobName;
@property (nonatomic, strong) NSMutableArray *jobDescription;
@property (nonatomic, strong) NSMutableArray *jobSalary;
@property (nonatomic, strong) NSMutableArray *jobHours;
@property (nonatomic, strong) NSMutableArray *jobDays;
@property (nonatomic, strong) NSMutableArray *jobLocation;
@property (nonatomic, strong) NSMutableArray *jobRequirements;
@property (nonatomic, strong) NSMutableArray *jobQualifications;

@property (nonatomic, strong) NSMutableArray *dataArray;

@property bool *dataChanged;
@property long *changedRow;
@property (nonatomic, strong) NSMutableArray *changeArray;
@property (nonatomic, strong) NSMutableArray *searchResultIndex;



@end
