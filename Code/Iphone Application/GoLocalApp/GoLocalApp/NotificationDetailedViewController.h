//
//  NotificationDetailedViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 4/18/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface NotificationDetailedViewController : UIViewController
@property (strong, nonatomic) IBOutlet UILabel *staffName;
@property (strong, nonatomic) IBOutlet UILabel *staffAge;
@property (strong, nonatomic) IBOutlet UILabel *staffExperience;
@property (strong, nonatomic) IBOutlet UILabel *appliedJob;

@property  (strong, nonatomic) NSMutableArray *details;
@property long row;

@end
