//
//  JobDetailedViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "JobDetailedViewController.h"
#import "EditJobViewController.h"

@interface JobDetailedViewController ()



@end

@implementation JobDetailedViewController

@synthesize jobName = _jobName;
@synthesize jobDescription = jobDescription;
@synthesize jobSalary = jobSalary;
@synthesize jobHours = jobHours;
@synthesize jobDays = jobDays;
@synthesize jobLocation = jobLocation;
@synthesize jobRequirements = jobRequirements;
@synthesize jobQualifications = jobQualifications;
@synthesize row = _row;


@synthesize jobDetails = _jobDetails;

- (void)viewDidLoad {
    [super viewDidLoad];
    // Do any additional setup after loading the view.
    
    self.jobName.text = [self.jobDetails objectAtIndex:0];
    self.jobDescription.text = [self.jobDetails objectAtIndex:1];
    self.jobSalary.text = [self.jobDetails objectAtIndex:2];
    self.jobHours.text = [self.jobDetails objectAtIndex:3];
    self.jobDays.text = [self.jobDetails objectAtIndex:4];
    self.jobLocation.text = [self.jobDetails objectAtIndex:5];
    self.jobRequirements.text = [self.jobDetails objectAtIndex:6];
    self.jobQualifications.text = [self.jobDetails objectAtIndex:7];

    
    if ([[[NSUserDefaults standardUserDefaults] valueForKey:@"hired"] isEqualToString:@"false"])
    {
        self.viewStaffButton.enabled = false;
        self.viewStaffButton.alpha = 0.4;
    }
    
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)ApplyButton:(id)sender {
    
    [[NSUserDefaults standardUserDefaults] setValue:@"true" forKey:@"enabled"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Application submitted"
                                                   message: @"Your application was sent to the employer."
                                                  delegate: self
                                         cancelButtonTitle:@"Ok"
                                         otherButtonTitles:nil];
    
    [alert show];
    
    
    [[NSUserDefaults standardUserDefaults] setInteger:self.row forKey:@"appliedJob"];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    
    UINavigationController *navigationController = self.navigationController;
    [navigationController popViewControllerAnimated:YES];
    
    }

- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
}

#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    
    
    if ([[segue identifier] isEqualToString:@"EditJob"])
    {
        EditJobViewController *editJobViewController = [segue destinationViewController];
        
        editJobViewController.jobData_ = self.jobDetails;
        editJobViewController.row_ = (long)self.row;
    
    }

}
@end
