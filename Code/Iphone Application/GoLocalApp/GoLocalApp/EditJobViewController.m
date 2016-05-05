//
//  EditJobViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 3/22/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "EditJobViewController.h"
#import "CreatedJobViewController.h"

@interface EditJobViewController ()

@end

@implementation EditJobViewController

@synthesize jobName_ = _jobName;
@synthesize jobDescription_ = jobDescription;
@synthesize jobSalary_ = jobSalary;
@synthesize jobHours_ = jobHours;
@synthesize jobDays_ = jobDays;
@synthesize jobLocation_ = jobLocation;
@synthesize jobRequirements_ = jobRequirements;
@synthesize jobQualifications_ = jobQualifications;
@synthesize row_ = _row_;
@synthesize jobData_ = _jobData;

bool changed=true;
NSString *temporary;


- (void)viewDidLoad {
    [super viewDidLoad];

    self.jobName_.text = [self.jobData_ objectAtIndex:0];
    self.jobDescription_.text = [self.jobData_ objectAtIndex:1];
    self.jobSalary_.text = [self.jobData_ objectAtIndex:2];
    self.jobHours_.text = [self.jobData_ objectAtIndex:3];
    self.jobDays_.text = [self.jobData_ objectAtIndex:4];
    self.jobLocation_.text = [self.jobData_ objectAtIndex:5];
    self.jobRequirements_.text = [self.jobData_ objectAtIndex:6];
    self.jobQualifications_.text = [self.jobData_ objectAtIndex:7];
    
    
}
- (IBAction)CancelButton:(id)sender {
    UINavigationController *navigationController = self.navigationController;
    [navigationController popViewControllerAnimated:YES];
}
- (IBAction)SaveButton:(id)sender {
    
    
    temporary = [NSString stringWithFormat:@"title%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobName_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"desc%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobDescription_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"loc%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobLocation_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"qual%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobQualifications_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"req%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobRequirements_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"sal%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobSalary_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"hours%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobHours_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temporary = [NSString stringWithFormat:@"days%d",(int)self.row_];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobDays_.text forKey:temporary];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    
    
    

    CreatedJobViewController *createdJobViewController = [self.storyboard instantiateViewControllerWithIdentifier:@"JobViewController"];
    
    createdJobViewController.changedRow = self.row_;
    
    createdJobViewController.dataChanged = &(changed);
    
    UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Edit saved"
                                                   message: @"Your edits have been saved."
                                                  delegate: self
                                         cancelButtonTitle:@"Ok"
                                         otherButtonTitles:nil];
    
    [alert show];
    
    UIViewController *View = [self.navigationController.viewControllers objectAtIndex:self.navigationController.viewControllers.count-3];
    [self.navigationController popToViewController:View animated:YES];
    
    

    
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


#pragma mark - Navigation
/*
// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
 
    if ([[segue identifier] isEqualToString:@"EditSaved"])
    {
        CreatedJobViewController *createdJobViewController = [segue destinationViewController];
 
        createdJobViewController.changeArray = [[NSMutableArray alloc] initWithObjects:self.jobName_.text,self.jobDescription_.text,self.jobSalary_.text,self.jobHours_.text,self.jobDays_.text,self.jobLocation_.text,self.jobRequirements_.text,self.jobQualifications_.text,nil];
        createdJobViewController.changedRow = _row_;
        createdJobViewController.dataChanged = true;
        
    }
    
    
}
*/

@end
