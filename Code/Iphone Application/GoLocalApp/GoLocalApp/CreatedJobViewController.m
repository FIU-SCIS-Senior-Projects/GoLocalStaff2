			//
//  CreatedJobViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 2/29/16.
//  Copyright © 2016 FIU. All rights reserved.
//
#import <CoreData/CoreData.h>
#import "CreatedJobViewController.h"
#import "CreatedJobViewCell.h"
#import "JobDetailedViewController.h"
#import "SearchResultsViewController.h"
#import "AppDelegate.h"

@interface CreatedJobViewController ()<UISearchDisplayDelegate>

@property (nonatomic, strong) UISearchController *searchController;
@property (nonatomic, strong) NSMutableArray *searchResults;
@property (nonatomic, strong) NSArray *job;


@end

@implementation CreatedJobViewController

@synthesize jobName = _jobName;
@synthesize jobDescription = jobDescription;
@synthesize jobSalary = jobSalary;
@synthesize jobHours = jobHours;
@synthesize jobDays = jobDays;
@synthesize jobLocation = jobLocation;
@synthesize jobRequirements = jobRequirements;
@synthesize jobQualifications = jobQualifications;
@synthesize dataArray = _dataArray;
@synthesize dataChanged = _dataChanged;
@synthesize changedRow = _changedRow;
@synthesize changeArray = _changeArray;
@synthesize searchResultIndex = _searchResultIndex;
int count;
NSString *tempString;
NSString *tempString2;
int passedRow;

- (void)viewDidLoad
{
    [super viewDidLoad];
    
    if([[NSUserDefaults standardUserDefaults] objectForKey:@"count"] != nil){
        count = [[NSUserDefaults standardUserDefaults] integerForKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
        
        self.jobName = [[NSMutableArray alloc] init];
        
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"title%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobName addObject:tempString2];
            
        }
        self.jobDescription = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"desc%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobDescription addObject:tempString2];
            
        }
        self.jobSalary = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"sal%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobSalary addObject:tempString2];
            
        }
        self.jobHours = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"hours%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobHours addObject:tempString2];
            
        }
        self.jobDays = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"days%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobDays addObject:tempString2];
            
        }   self.jobLocation = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"loc%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobLocation addObject:tempString2];
            
        }
        self.jobRequirements = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"req%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobRequirements addObject:tempString2];
            
        }
        self.jobQualifications = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"qual%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobQualifications addObject:tempString2];
            
        }
        
        
    }
    else{
        count = 0;
        [[NSUserDefaults standardUserDefaults] setInteger:0 forKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
    }
    
}

- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];

    if([[NSUserDefaults standardUserDefaults] objectForKey:@"count"] != nil){
        count = [[NSUserDefaults standardUserDefaults] integerForKey:@"count"];
        [[NSUserDefaults standardUserDefaults] synchronize];
        
        self.jobName = [[NSMutableArray alloc] init];
        
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"title%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobName addObject:tempString2];
            
        }
        self.jobDescription = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"desc%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobDescription addObject:tempString2];
            
        }
        self.jobSalary = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"sal%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobSalary addObject:tempString2];
            
        }
        self.jobHours = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"hours%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobHours addObject:tempString2];
            
        }
        self.jobDays = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"days%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobDays addObject:tempString2];
            
        }   self.jobLocation = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"loc%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobLocation addObject:tempString2];
            
        }
        self.jobRequirements = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"req%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobRequirements addObject:tempString2];
            
        }
        self.jobQualifications = [[NSMutableArray alloc] init];
        for (int i = 0; i < count ; i++){
            
            tempString = [NSString stringWithFormat:@"qual%d",i];
            tempString2 = [[NSUserDefaults standardUserDefaults] objectForKey:tempString];
            [self.jobQualifications addObject:tempString2];
            
        }
        
        
    }
    


}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

#pragma mark - Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    return [self.jobName count];
}



- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {

    
    
    static NSString *CellIdentifier = @"JobResults";
    CreatedJobViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
    if (cell == nil){
        
        cell = [[CreatedJobViewCell alloc]
                initWithStyle:UITableViewCellStyleDefault
                reuseIdentifier:CellIdentifier];
    }

    
    cell.jobLabel.text = [self.jobName objectAtIndex: [indexPath row]];
    
    
    return cell;
    
}



#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
  
    
    if ([[segue identifier] isEqualToString:@"DetailedJob"])
    {
        JobDetailedViewController *detailedViewController = [segue destinationViewController];
        
        NSIndexPath *myIndexPath = [self.tableView indexPathForSelectedRow];
        detailedViewController.row = (long)[myIndexPath row];	
        
        detailedViewController.jobDetails = [[NSMutableArray alloc] initWithObjects:[self.jobName objectAtIndex:[myIndexPath row]],[self.jobDescription objectAtIndex:[myIndexPath row]],[self.jobSalary objectAtIndex:[myIndexPath row]],[self.jobHours objectAtIndex:[myIndexPath row]],[self.jobDays objectAtIndex:[myIndexPath row]],[self.jobLocation objectAtIndex:[myIndexPath row]],[self.jobRequirements objectAtIndex:[myIndexPath row]],[self.jobQualifications objectAtIndex:[myIndexPath row]], nil];
        
    }
    if ([[segue identifier] isEqualToString:@"StaffJob"])
    {
        JobDetailedViewController *detailedViewController = [segue destinationViewController];
        
        //NSIndexPath *myIndexPath = [self.tableView indexPathForSelectedRow];
        NSIndexPath *myIndexPath = [self.tableView indexPathForCell:sender];

        detailedViewController.row = (long)[myIndexPath row];
        
        detailedViewController.jobDetails = [[NSMutableArray alloc] initWithObjects:[self.jobName objectAtIndex:[myIndexPath row]],[self.jobDescription objectAtIndex:[myIndexPath row]],[self.jobSalary objectAtIndex:[myIndexPath row]],[self.jobHours objectAtIndex:[myIndexPath row]],[self.jobDays objectAtIndex:[myIndexPath row]],[self.jobLocation objectAtIndex:[myIndexPath row]],[self.jobRequirements objectAtIndex:[myIndexPath row]],[self.jobQualifications objectAtIndex:[myIndexPath row]], nil];
        
    }
    
}


@end


