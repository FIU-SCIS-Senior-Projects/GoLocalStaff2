//
//  CreateJobViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "AppDelegate.h"


@interface CreateJobViewController : UIViewController

@property (strong, nonatomic) IBOutlet UITextField *jobtitle;

@property (strong, nonatomic) IBOutlet UITextField *jobsalary;
@property (strong, nonatomic) IBOutlet UITextField *jobhours;
@property (strong, nonatomic) IBOutlet UITextField *jobdays;
@property (strong, nonatomic) IBOutlet UITextField *joblocation;
@property (strong, nonatomic) IBOutlet UITextField *jobrequirements;
@property (strong, nonatomic) IBOutlet UITextField *jobqualifications;
@property (strong, nonatomic) IBOutlet UITextView *jobdescription;
- (IBAction)submitButton:(id)sender;


@end
