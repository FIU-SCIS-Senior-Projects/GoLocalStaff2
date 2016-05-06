//
//  AssignedStaffDetailedViewController.h
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 5/2/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface AssignedStaffDetailedViewController : UIViewController
@property (strong, nonatomic) IBOutlet UILabel *sName;
@property (strong, nonatomic) IBOutlet UILabel *sAge;
@property (strong, nonatomic) IBOutlet UILabel *sExperience;
@property  (strong, nonatomic) NSMutableArray *sDetails;
@property long row;


@end
