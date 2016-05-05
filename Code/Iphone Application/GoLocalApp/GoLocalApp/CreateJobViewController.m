//
//  CreateJobViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "CreateJobViewController.h"
#import "AppDelegate.h"


@interface CreateJobViewController ()

@end

@implementation CreateJobViewController
@synthesize jobdays = _jobdays;
@synthesize jobdescription = _jobdescription;
@synthesize jobhours = _jobhours;
@synthesize joblocation = _joblocation;
@synthesize jobqualifications = _jobqualifications;
@synthesize jobrequirements = _jobrequirements;
@synthesize jobsalary = _jobsalary;
@synthesize jobtitle = _jobtitle;

int counter = 0;
NSString *temp;

- (void)viewDidLoad {
    [super viewDidLoad];
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
}





#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
/*
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
   
     
        
}*/

- (IBAction)submitButton:(id)sender {
    
    if ((self.jobtitle.text.length > 0 && self.jobtitle.text != nil && ![self.jobtitle.text isEqual:@""])
        &&(self.jobdays.text.length > 0 && self.jobdays.text != nil && ![self.jobdays.text isEqual:@""])
        &&(self.jobdescription.text.length > 0 && self.jobdescription.text != nil && ![self.jobdescription.text isEqual:@""])
        &&(self.jobhours.text.length > 0 && self.jobhours.text != nil && ![self.jobhours.text isEqual:@""])
        &&(self.joblocation.text.length > 0 && self.joblocation.text != nil && ![self.joblocation.text isEqual:@""])
        &&(self.jobqualifications.text.length > 0 && self.jobqualifications.text != nil && ![self.jobqualifications.text isEqual:@""])
        &&(self.jobrequirements.text.length > 0 && self.jobrequirements.text != nil && ![self.jobrequirements.text isEqual:@""])
        &&(self.jobsalary.text.length > 0 && self.jobsalary.text != nil && ![self.jobsalary.text isEqual:@""])
        )
    {
    
    if([[NSUserDefaults standardUserDefaults] objectForKey:@"count"] != nil){
        counter = [[NSUserDefaults standardUserDefaults] integerForKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
  
    }
    else{
        counter = 0;
        [[NSUserDefaults standardUserDefaults] setInteger:0 forKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
    }
    
    temp = [NSString stringWithFormat:@"title%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobtitle.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"desc%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobdescription.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"loc%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.joblocation.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"qual%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobqualifications.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"req%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobrequirements.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"sal%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobsalary.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"hours%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobhours.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
    
    temp = [NSString stringWithFormat:@"days%d",counter];
    
    [[NSUserDefaults standardUserDefaults] setValue:self.jobdays.text forKey:temp];
    [[NSUserDefaults standardUserDefaults] synchronize];
        
        UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Job Posted!"
                                                       message: @"The job has been posted. You can view and manage it through Manage Jobs in the home screen."
                                                      delegate: self
                                             cancelButtonTitle:@"Ok"
                                             otherButtonTitles:nil];
        
        [alert show];
        
        [[NSUserDefaults standardUserDefaults] setInteger:counter+1 forKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
        
        UINavigationController *navigationController = self.navigationController;
        [navigationController popViewControllerAnimated:YES];
        
    
    }
    
    else{
        
        UIAlertView *alert = [[UIAlertView alloc]initWithTitle: @"Form Incomplete"
                                                       message: @"Please enter the missing field."
                                                      delegate: self
                                             cancelButtonTitle:@"Ok"
                                             otherButtonTitles:nil];
        
        [alert show];
        
    }
    
  }
@end
