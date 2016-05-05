//
//  NotificationDetailedViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 4/18/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "NotificationDetailedViewController.h"

@interface NotificationDetailedViewController ()


@end

@implementation NotificationDetailedViewController

@synthesize  staffName = _staffName;
@synthesize staffAge = _staffAge;
@synthesize staffExperience = _staffExperience;
@synthesize appliedJob = _appliedJob;

@synthesize details = _details;
@synthesize row =_row;
NSString *temporaryString;
NSString *temporaryString2;
int tempRow;


- (void)viewDidLoad {
    [super viewDidLoad];
    
    tempRow = [[NSUserDefaults standardUserDefaults] integerForKey:@"appliedJob"];
    temporaryString = [NSString stringWithFormat:@"title%d",tempRow];

    self.staffName.text = [self.details objectAtIndex:0];
    self.staffAge.text = [self.details objectAtIndex:1];
    self.staffExperience.text = [self.details objectAtIndex:2];
    self.appliedJob.text = [[NSUserDefaults standardUserDefaults] valueForKey:temporaryString];


}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)staffAccept:(id)sender {
    [[NSUserDefaults standardUserDefaults] setValue:@"false" forKey:@"enabled"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    [[NSUserDefaults standardUserDefaults] setValue:@"true" forKey:@"hired"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    
    UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Staff hired"
                                                   message: @"The application has been accepted."
                                                  delegate: self
                                         cancelButtonTitle:@"Ok"
                                         otherButtonTitles:nil];
    
    [alert show];
    
    UINavigationController *navigationController = self.navigationController;
    [navigationController popViewControllerAnimated:YES];
}

- (IBAction)staffReject:(id)sender {
    [[NSUserDefaults standardUserDefaults] setValue:@"false" forKey:@"enabled"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    
    [[NSUserDefaults standardUserDefaults] setValue:@"false" forKey:@"hired"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    
    UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Staff rejected"
                                                   message: @"The application has been rejected."
                                                  delegate: self
                                         cancelButtonTitle:@"Ok"
                                         otherButtonTitles:nil];
    
    [alert show];
    
    UINavigationController *navigationController = self.navigationController;
    [navigationController popViewControllerAnimated:YES];
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
