//
//  AssignedStaffTableViewController.m
//  GoLocalApp
//
//  Created by Daniel Gonzalez on 5/2/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import "AssignedStaffTableViewController.h"
#import "AssignedStaffTableViewCell.h"
#import "AssignedStaffDetailedViewController.h"

@interface AssignedStaffTableViewController ()

@end

@implementation AssignedStaffTableViewController

@synthesize staffAge = _staffAge;
@synthesize staffExperience = _staffExperience;
@synthesize staffName = _staffName;
- (void)viewDidLoad {
    [super viewDidLoad];
    
    self.staffName = [[NSMutableArray alloc]initWithObjects:@"John Doe", nil];
    self.staffExperience = [[NSMutableArray alloc]initWithObjects:@"Model", nil];
    self.staffAge = [[NSMutableArray alloc]initWithObjects:@"25", nil];
    
}


- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)viewWillAppear:(BOOL)animated {
    [super viewWillAppear:animated];
    [self.tableView reloadData];
}

#pragma mark - Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    return [self.staffName count];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
    static NSString *CellIdentifier = @"AssignedStaffCell";
    AssignedStaffTableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    
    if (cell == nil){
        
        cell = [[AssignedStaffTableViewCell alloc]
                initWithStyle:UITableViewCellStyleDefault
                reuseIdentifier:CellIdentifier];
    }
    
    if ([[[NSUserDefaults standardUserDefaults] valueForKey:@"hired"] isEqualToString:@"false"]){
        
        cell.userInteractionEnabled = NO;
        cell.stName.enabled = NO;
        cell.stName.text = @"No Staff Assigned";
    }
    else{
        cell.stName.text = [self.staffName objectAtIndex: [indexPath row]];
    }
    
    return cell;
}



#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    
    
    
    if ([[segue identifier] isEqualToString:@"AssignedStaff"])
    {
        AssignedStaffDetailedViewController *detailedViewController = [segue destinationViewController];
        
        NSIndexPath *myIndexPath = [self.tableView indexPathForSelectedRow];
        detailedViewController.row = (long)[myIndexPath row];
        
        
        detailedViewController.sDetails = [[NSMutableArray alloc] initWithObjects:[self.staffName objectAtIndex:[myIndexPath row]],[self.staffAge objectAtIndex:[myIndexPath row]],[self.staffExperience objectAtIndex:[myIndexPath row]], nil];
        
    }

}


@end
