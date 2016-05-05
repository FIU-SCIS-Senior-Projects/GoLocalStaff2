//
//  JobDatabase.h
//  GoLocalApp
//
//  Created by Dan Tehman on 3/14/16.
//  Copyright © 2016 FIU. All rights reserved.
//

#import <CoreData/CoreData.h>

@interface JobDatabase : NSManagedObject

@property (nonatomic, strong) NSString 	*title;
@property (nonatomic, strong) NSString 	*salary;
@property (nonatomic, strong) NSString 	*days;
@property (nonatomic, strong) NSString 	*hours;
@property (nonatomic, strong) NSString 	*description;
@property (nonatomic, strong) NSString 	*requirements;
@property (nonatomic, strong) NSString 	*qualifications;
@property (nonatomic, strong) NSString 	*location;


@end
