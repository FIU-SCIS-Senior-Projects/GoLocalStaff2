//
//  EditJobViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 3/22/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface EditJobViewController : UIViewController

@property (strong, nonatomic) NSMutableArray *jobData_;
@property (strong, nonatomic) IBOutlet UITextField *jobName_;
@property (strong, nonatomic) IBOutlet UITextField *jobSalary_;
@property (strong, nonatomic) IBOutlet UITextField *jobHours_;
@property (strong, nonatomic) IBOutlet UITextField *jobDays_;
@property (strong, nonatomic) IBOutlet UITextField *jobLocation_;
@property (strong, nonatomic) IBOutlet UITextField *jobRequirements_;
@property (strong, nonatomic) IBOutlet UITextField *jobQualifications_;
@property long *row_;
@property (strong, nonatomic) IBOutlet UITextView *jobDescription_;

@end
