//
//  AssignedStaffDetailedViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 5/2/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "AssignedStaffDetailedViewController.h"

@interface AssignedStaffDetailedViewController ()

@end

@implementation AssignedStaffDetailedViewController

@synthesize sName = _sName;
@synthesize sAge = _sAge;
@synthesize sExperience = _sExperience;
@synthesize sDetails = _sDetails;
@synthesize row =_row;

- (void)viewDidLoad {
    [super viewDidLoad];

    self.sName.text = [self.sDetails objectAtIndex:0];
    self.sAge.text = [self.sDetails objectAtIndex:1];
    self.sExperience.text = [self.sDetails objectAtIndex:2];

}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)ReturnButton:(id)sender {
    
    UINavigationController *navigationController = self.navigationController;
    [navigationController popViewControllerAnimated:YES];
    
}


- (IBAction)DissmissStaffButton:(id)sender {
    
    
    UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Dismiss staff?"
                                                   message: @"Are you sure that you want to dismiss this staff?"
                                                  delegate: self
                                         cancelButtonTitle:@"Cancel"
                                         otherButtonTitles:@"Confirm",nil];
    
    alert.tag = 1;
    [alert show];
}

-(void)alertView:(UIAlertView *)alertView didDismissWithButtonIndex:(NSInteger)buttonIndex {
    if (alertView.tag == 1) {
        if (buttonIndex == 0) {
            // cancel pressed, do nothing

            
        } else {
            
            [[NSUserDefaults standardUserDefaults] setValue:@"false" forKey:@"hired"];
            [[NSUserDefaults standardUserDefaults] synchronize];
            
            UINavigationController *navigationController = self.navigationController;
            [navigationController popViewControllerAnimated:YES];
        }
    }
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end
