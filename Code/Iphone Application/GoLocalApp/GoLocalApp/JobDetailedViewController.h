//
//  JobDetailedViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface JobDetailedViewController : UIViewController

@property (strong, nonatomic) IBOutlet UILabel *jobName;
@property (strong, nonatomic) IBOutlet UILabel *jobSalary;
@property (strong, nonatomic) IBOutlet UILabel *jobHours;
@property (strong, nonatomic) IBOutlet UILabel *jobDays;
@property (strong, nonatomic) IBOutlet UILabel *jobLocation;
@property (strong, nonatomic) IBOutlet UILabel *jobRequirements;
@property (strong, nonatomic) IBOutlet UILabel *jobQualifications;

@property (strong, nonatomic) IBOutlet UITextView *jobDescription;

@property (strong, nonatomic) NSMutableArray *jobDetails;

@property long row;

@property (strong, nonatomic) IBOutlet UIButton *viewStaffButton;

@end
