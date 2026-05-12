<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use App\Models\PropertyUnit;
use App\Models\Tenant;
use App\Models\Maintainer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\Expense;
use App\Models\MaintenanceRequest;
use App\Models\Type;
use App\Models\Contact;
use App\Models\NoticeBoard;
use App\Models\N8n;
use App\Models\Amenity;
use App\Models\Advantage;
use App\Models\Agreement;
use App\Models\Blog;
use App\Models\Coupon;
use App\Models\FAQ;
use App\Models\Page;
use App\Models\HomePage;
use App\Models\AuthPage;
use App\Models\Additional;
use App\Models\Notification;
use App\Models\AiTemplate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('==========================================');
        $this->command->info('🚀 STARTING COMPLETE TEST DATA SEEDER');
        $this->command->info('==========================================');

        $owner = User::where('email', 'owner@gmail.com')->first();

        if (!$owner) {
            $this->command->error('Owner not found! Run DefaultDataUsersTableSeeder first.');
            return;
        }

        $this->command->info('📌 Owner found: ' . $owner->email);

        // ============================================
        // 1. CREATE TYPES
        // ============================================
        $this->command->info('📌 Creating types...');

        $typeData = [
            ['title' => 'Plumbing', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'Electrical', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'HVAC', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'Appliance', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'Structural', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'Pest Control', 'type' => 'issue', 'parent_id' => $owner->id],
            ['title' => 'Maintenance', 'type' => 'expense', 'parent_id' => $owner->id],
            ['title' => 'Repair', 'type' => 'expense', 'parent_id' => $owner->id],
            ['title' => 'Utilities', 'type' => 'expense', 'parent_id' => $owner->id],
            ['title' => 'Rent', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Utility', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Maintenance', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Service', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Pet Fee', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Parking', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Security', 'type' => 'invoice', 'parent_id' => $owner->id],
            ['title' => 'Late Fee', 'type' => 'invoice', 'parent_id' => $owner->id],
        ];

        $createdTypes = [];
        foreach ($typeData as $data) {
            $type = Type::firstOrCreate(
                ['title' => $data['title'], 'type' => $data['type'], 'parent_id' => $owner->id],
                $data
            );
            $createdTypes[$data['title']] = $type;
        }
        $this->command->info('   ✅ ' . count($typeData) . ' types created');

        // ============================================
        // 2. CREATE PROPERTIES
        // ============================================
        $this->command->info('📌 Creating properties...');

        $propertiesData = [
            [
                'name' => 'Sunset Luxury Apartments',
                'address' => '123 Sunset Boulevard, Los Angeles, CA 90210',
                'description' => 'Luxury apartments with ocean views, pool, and fitness center.',
                'parent_id' => $owner->id,
                'is_active' => 1,
            ],
            [
                'name' => 'Downtown Business Tower',
                'address' => '456 Commerce Street, New York, NY 10001',
                'description' => 'Premium office spaces in the heart of financial district.',
                'parent_id' => $owner->id,
                'is_active' => 1,
            ],
            [
                'name' => 'Green Valley Villas',
                'address' => '789 Green Valley Road, Austin, TX 78701',
                'description' => 'Spacious villas with private gardens and modern amenities.',
                'parent_id' => $owner->id,
                'is_active' => 1,
            ],
        ];

        $properties = [];
        foreach ($propertiesData as $propData) {
            $property = Property::firstOrCreate(
                ['name' => $propData['name'], 'parent_id' => $owner->id],
                $propData
            );
            $properties[] = $property;
            $this->command->info('   ✅ Property: ' . $property->name);
        }

        // ============================================
        // 3. CREATE UNITS
        // ============================================
        $this->command->info('📌 Creating units...');

        $unitsData = [
            ['property_id' => $properties[0]->id, 'name' => '101', 'bedroom' => 1, 'baths' => 1, 'rent' => 1800, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[0]->id, 'name' => '102', 'bedroom' => 2, 'baths' => 2, 'rent' => 2500, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[0]->id, 'name' => '103', 'bedroom' => 2, 'baths' => 2, 'rent' => 2400, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[0]->id, 'name' => '201', 'bedroom' => 3, 'baths' => 2, 'rent' => 3200, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[0]->id, 'name' => '202', 'bedroom' => 3, 'baths' => 2, 'rent' => 3300, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[0]->id, 'name' => '301', 'bedroom' => 4, 'baths' => 3, 'rent' => 4500, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[1]->id, 'name' => 'Suite 100', 'bedroom' => 0, 'baths' => 1, 'rent' => 3500, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[1]->id, 'name' => 'Suite 200', 'bedroom' => 0, 'baths' => 1, 'rent' => 3800, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[1]->id, 'name' => 'Suite 300', 'bedroom' => 0, 'baths' => 2, 'rent' => 5000, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[1]->id, 'name' => 'Suite 400', 'bedroom' => 0, 'baths' => 2, 'rent' => 5500, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[1]->id, 'name' => 'Suite 500', 'bedroom' => 0, 'baths' => 3, 'rent' => 7500, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[2]->id, 'name' => 'Villa A', 'bedroom' => 3, 'baths' => 3, 'rent' => 3500, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[2]->id, 'name' => 'Villa B', 'bedroom' => 3, 'baths' => 3, 'rent' => 3700, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[2]->id, 'name' => 'Villa C', 'bedroom' => 4, 'baths' => 3, 'rent' => 4200, 'rent_type' => 'monthly', 'is_occupied' => 1, 'parent_id' => $owner->id],
            ['property_id' => $properties[2]->id, 'name' => 'Villa D', 'bedroom' => 4, 'baths' => 4, 'rent' => 4800, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
            ['property_id' => $properties[2]->id, 'name' => 'Villa E', 'bedroom' => 5, 'baths' => 4, 'rent' => 5500, 'rent_type' => 'monthly', 'is_occupied' => 0, 'parent_id' => $owner->id],
        ];

        $units = [];
        foreach ($unitsData as $unitData) {
            $unit = PropertyUnit::firstOrCreate(
                [
                    'name' => $unitData['name'],
                    'property_id' => $unitData['property_id'],
                    'parent_id' => $owner->id,
                ],
                $unitData
            );
            $units[] = $unit;
        }
        $this->command->info('   ✅ ' . count($units) . ' units created');

        // ============================================
        // 4. CREATE TENANTS
        // ============================================
        $this->command->info('📌 Creating tenants...');

        $tenantsData = [
            ['name' => 'John Smith', 'email' => 'john.smith@example.com', 'unit' => $units[0]->id, 'property' => $properties[0]->id],
            ['name' => 'Sarah Johnson', 'email' => 'sarah.johnson@example.com', 'unit' => $units[1]->id, 'property' => $properties[0]->id],
            ['name' => 'Michael Brown', 'email' => 'michael.brown@example.com', 'unit' => $units[3]->id, 'property' => $properties[0]->id],
            ['name' => 'Emily Davis', 'email' => 'emily.davis@example.com', 'unit' => $units[6]->id, 'property' => $properties[1]->id],
            ['name' => 'David Wilson', 'email' => 'david.wilson@example.com', 'unit' => $units[7]->id, 'property' => $properties[1]->id],
            ['name' => 'Lisa Anderson', 'email' => 'lisa.anderson@example.com', 'unit' => $units[8]->id, 'property' => $properties[1]->id],
            ['name' => 'Robert Taylor', 'email' => 'robert.taylor@example.com', 'unit' => $units[11]->id, 'property' => $properties[2]->id],
            ['name' => 'Maria Garcia', 'email' => 'maria.garcia@example.com', 'unit' => $units[12]->id, 'property' => $properties[2]->id],
            ['name' => 'James Martinez', 'email' => 'james.martinez@example.com', 'unit' => $units[13]->id, 'property' => $properties[2]->id],
        ];

        $tenants = [];
        $tenantRole = Role::where('name', 'tenant')->where('parent_id', $owner->id)->first();

        foreach ($tenantsData as $tData) {
            $user = User::firstOrCreate(
                ['email' => $tData['email']],
                [
                    'first_name' => explode(' ', $tData['name'])[0],
                    'last_name' => explode(' ', $tData['name'])[1] ?? '',
                    'email' => $tData['email'],
                    'password' => Hash::make('password'),
                    'type' => 'tenant',
                    'lang' => 'english',
                    'email_verified_at' => now(),
                    'profile' => 'avatar.png',
                    'parent_id' => $owner->id,
                    'is_active' => 1,
                ]
            );

            if ($tenantRole && !$user->hasRole($tenantRole->name)) {
                $user->assignRole($tenantRole);
            }

            $tenant = Tenant::firstOrCreate(
                ['user_id' => $user->id, 'parent_id' => $owner->id],
                [
                    'user_id' => $user->id,
                    'unit' => $tData['unit'],
                    'property' => $tData['property'],
                    'lease_start_date' => Carbon::now()->subMonths(rand(1, 6))->toDateString(),
                    'lease_end_date' => Carbon::now()->addMonths(rand(6, 12))->toDateString(),
                    'parent_id' => $owner->id,
                ]
            );
            $tenants[] = $tenant;
        }

        $defaultTenant = User::where('email', 'tenant@gmail.com')->first();
        if ($defaultTenant && count($units) > 0) {
            Tenant::firstOrCreate(
                ['user_id' => $defaultTenant->id, 'parent_id' => $owner->id],
                [
                    'user_id' => $defaultTenant->id,
                    'unit' => $units[2]->id,
                    'property' => $properties[0]->id,
                    'lease_start_date' => Carbon::now()->subMonths(2)->toDateString(),
                    'lease_end_date' => Carbon::now()->addMonths(10)->toDateString(),
                    'parent_id' => $owner->id,
                ]
            );
        }
        $this->command->info('   ✅ ' . count($tenants) . ' tenants created');

        // ============================================
        // 5. CREATE MAINTAINERS
        // ============================================
        $this->command->info('📌 Creating maintainers...');

        $maintainersData = [
            ['name' => 'Mike Johnson', 'email' => 'mike@maintainer.com', 'type_id' => $createdTypes['Plumbing']->id],
            ['name' => 'David Wilson', 'email' => 'david@maintainer.com', 'type_id' => $createdTypes['Electrical']->id],
            ['name' => 'Robert Chen', 'email' => 'robert@maintainer.com', 'type_id' => $createdTypes['HVAC']->id],
        ];

        $maintainers = [];
        $maintainerRole = Role::where('name', 'maintainer')->where('parent_id', $owner->id)->first();

        foreach ($maintainersData as $mData) {
            $user = User::firstOrCreate(
                ['email' => $mData['email']],
                [
                    'first_name' => explode(' ', $mData['name'])[0],
                    'last_name' => explode(' ', $mData['name'])[1] ?? '',
                    'email' => $mData['email'],
                    'password' => Hash::make('password'),
                    'type' => 'maintainer',
                    'lang' => 'english',
                    'email_verified_at' => now(),
                    'profile' => 'avatar.png',
                    'parent_id' => $owner->id,
                    'is_active' => 1,
                ]
            );

            if ($maintainerRole && !$user->hasRole($maintainerRole->name)) {
                $user->assignRole($maintainerRole);
            }

            $maintainer = Maintainer::firstOrCreate(
                ['user_id' => $user->id, 'parent_id' => $owner->id],
                [
                    'user_id' => $user->id,
                    'type_id' => $mData['type_id'],
                    'parent_id' => $owner->id,
                ]
            );
            $maintainers[] = $maintainer;
        }
        $this->command->info('   ✅ ' . count($maintainers) . ' maintainers created');

        // ============================================
        // 6. CREATE INVOICES
        // ============================================
        $this->command->info('📌 Creating invoices...');

        $invoices = [];
        foreach ($tenants as $index => $tenant) {
            $unit = PropertyUnit::find($tenant->unit);
            if ($unit) {
                $lastInvoice = Invoice::orderBy('id', 'desc')->first();
                $nextInvoiceId = $lastInvoice ? $lastInvoice->id + 1 : 1;

                $statuses = ['open', 'open', 'paid', 'partial_paid'];
                $status = $statuses[array_rand($statuses)];

                $invoice = Invoice::create([
                    'invoice_id' => $nextInvoiceId,
                    'property_id' => $tenant->property,
                    'unit_id' => $tenant->unit,
                    'invoice_month' => Carbon::now()->subMonths(rand(0, 2))->startOfMonth()->toDateString(),
                    'end_date' => Carbon::now()->subMonths(rand(0, 2))->endOfMonth()->toDateString(),
                    'status' => $status,
                    'notes' => 'Monthly rent for Unit ' . $unit->name . ' - Amount: $' . $unit->rent,
                    'parent_id' => $owner->id,
                ]);
                $invoices[] = $invoice;
            }
        }
        $this->command->info('   ✅ ' . count($invoices) . ' invoices created');

        // ============================================
        // 7. CREATE INVOICE ITEMS
        // ============================================
        $this->command->info('📌 Creating invoice items...');

        $rentTypeId = $createdTypes['Rent']->id;
        $utilityTypeId = $createdTypes['Utility']->id;
        $maintenanceTypeId = $createdTypes['Maintenance']->id;
        $serviceTypeId = $createdTypes['Service']->id;
        $petFeeTypeId = $createdTypes['Pet Fee']->id;
        $parkingTypeId = $createdTypes['Parking']->id;
        $securityTypeId = $createdTypes['Security']->id;

        $invoiceItemsData = [
            ['invoice_id' => $invoices[0]->id ?? 1, 'invoice_type' => $rentTypeId, 'amount' => 1800, 'description' => 'Base Rent - Unit 101'],
            ['invoice_id' => $invoices[1]->id ?? 2, 'invoice_type' => $rentTypeId, 'amount' => 2500, 'description' => 'Base Rent - Unit 102'],
            ['invoice_id' => $invoices[1]->id ?? 2, 'invoice_type' => $utilityTypeId, 'amount' => 85, 'description' => 'Water & Sewer'],
            ['invoice_id' => $invoices[2]->id ?? 3, 'invoice_type' => $rentTypeId, 'amount' => 3200, 'description' => 'Base Rent - Unit 201'],
            ['invoice_id' => $invoices[2]->id ?? 3, 'invoice_type' => $petFeeTypeId, 'amount' => 50, 'description' => 'Monthly Pet Fee'],
            ['invoice_id' => $invoices[2]->id ?? 3, 'invoice_type' => $parkingTypeId, 'amount' => 75, 'description' => 'Covered Parking'],
            ['invoice_id' => $invoices[3]->id ?? 4, 'invoice_type' => $rentTypeId, 'amount' => 3500, 'description' => 'Base Rent - Suite 100'],
            ['invoice_id' => $invoices[3]->id ?? 4, 'invoice_type' => $serviceTypeId, 'amount' => 200, 'description' => 'Janitorial Service'],
            ['invoice_id' => $invoices[4]->id ?? 5, 'invoice_type' => $rentTypeId, 'amount' => 3800, 'description' => 'Base Rent - Suite 200'],
            ['invoice_id' => $invoices[4]->id ?? 5, 'invoice_type' => $parkingTypeId, 'amount' => 100, 'description' => 'Reserved Parking'],
            ['invoice_id' => $invoices[5]->id ?? 6, 'invoice_type' => $rentTypeId, 'amount' => 5000, 'description' => 'Base Rent - Suite 300'],
            ['invoice_id' => $invoices[5]->id ?? 6, 'invoice_type' => $securityTypeId, 'amount' => 100, 'description' => 'Security Monitoring'],
            ['invoice_id' => $invoices[6]->id ?? 7, 'invoice_type' => $rentTypeId, 'amount' => 3500, 'description' => 'Base Rent - Villa A'],
            ['invoice_id' => $invoices[6]->id ?? 7, 'invoice_type' => $maintenanceTypeId, 'amount' => 150, 'description' => 'Pool Maintenance'],
            ['invoice_id' => $invoices[7]->id ?? 8, 'invoice_type' => $rentTypeId, 'amount' => 3700, 'description' => 'Base Rent - Villa B'],
            ['invoice_id' => $invoices[7]->id ?? 8, 'invoice_type' => $securityTypeId, 'amount' => 100, 'description' => 'Security System'],
            ['invoice_id' => $invoices[8]->id ?? 9, 'invoice_type' => $rentTypeId, 'amount' => 4200, 'description' => 'Base Rent - Villa C'],
            ['invoice_id' => $invoices[8]->id ?? 9, 'invoice_type' => $petFeeTypeId, 'amount' => 75, 'description' => 'Pet Fee'],
        ];

        foreach ($invoiceItemsData as $itemData) {
            InvoiceItem::firstOrCreate(
                [
                    'invoice_id' => $itemData['invoice_id'],
                    'invoice_type' => $itemData['invoice_type'],
                    'description' => $itemData['description'],
                ],
                $itemData
            );
        }
        $this->command->info('   ✅ ' . count($invoiceItemsData) . ' invoice items created');

        // ============================================
        // 8. CREATE INVOICE PAYMENTS
        // ============================================
        $this->command->info('📌 Creating invoice payments...');

        $paymentsData = [
            ['invoice_id' => $invoices[0]->id ?? 1, 'payment_type' => 'credit_card', 'amount' => 1800, 'notes' => 'Full payment'],
            ['invoice_id' => $invoices[2]->id ?? 3, 'payment_type' => 'credit_card', 'amount' => 3200, 'notes' => 'Full payment'],
            ['invoice_id' => $invoices[5]->id ?? 6, 'payment_type' => 'bank_transfer', 'amount' => 5000, 'notes' => 'Full payment'],
            ['invoice_id' => $invoices[8]->id ?? 9, 'payment_type' => 'cash', 'amount' => 2000, 'notes' => 'Partial payment'],
        ];

        foreach ($paymentsData as $paymentData) {
            InvoicePayment::firstOrCreate(
                [
                    'invoice_id' => $paymentData['invoice_id'],
                    'transaction_id' => 'TXN_' . uniqid(),
                ],
                [
                    'invoice_id' => $paymentData['invoice_id'],
                    'transaction_id' => 'TXN_' . uniqid(),
                    'payment_type' => $paymentData['payment_type'],
                    'amount' => $paymentData['amount'],
                    'payment_date' => Carbon::now()->toDateString(),
                    'parent_id' => $owner->id,
                    'notes' => $paymentData['notes'],
                ]
            );
        }
        $this->command->info('   ✅ ' . count($paymentsData) . ' invoice payments created');

        // ============================================
        // 9. CREATE MAINTENANCE REQUESTS
        // ============================================
        $this->command->info('📌 Creating maintenance requests...');

        $maintenanceRequestsData = [
            ['tenant_index' => 0, 'type' => 'Plumbing', 'notes' => 'Leaking faucet in kitchen', 'status' => 'pending'],
            ['tenant_index' => 1, 'type' => 'Electrical', 'notes' => 'Power outlet not working', 'status' => 'in_progress'],
            ['tenant_index' => 2, 'type' => 'HVAC', 'notes' => 'AC not cooling properly', 'status' => 'pending'],
            ['tenant_index' => 3, 'type' => 'Plumbing', 'notes' => 'Toilet is clogged', 'status' => 'completed'],
            ['tenant_index' => 4, 'type' => 'Appliance', 'notes' => 'Dishwasher not draining', 'status' => 'pending'],
            ['tenant_index' => 5, 'type' => 'Electrical', 'notes' => 'Light fixture flickering', 'status' => 'in_progress'],
            ['tenant_index' => 6, 'type' => 'HVAC', 'notes' => 'Heater not working', 'status' => 'pending'],
            ['tenant_index' => 7, 'type' => 'Plumbing', 'notes' => 'Water heater leaking', 'status' => 'pending'],
        ];

        foreach ($maintenanceRequestsData as $mrData) {
            if (isset($tenants[$mrData['tenant_index']]) && isset($createdTypes[$mrData['type']])) {
                $tenant = $tenants[$mrData['tenant_index']];
                $type = $createdTypes[$mrData['type']];
                $maintainer = $maintainers[array_rand($maintainers)];

                MaintenanceRequest::firstOrCreate(
                    [
                        'property_id' => $tenant->property,
                        'unit_id' => $tenant->unit,
                        'issue_type' => $type->id,
                        'parent_id' => $owner->id,
                    ],
                    [
                        'property_id' => $tenant->property,
                        'unit_id' => $tenant->unit,
                        'issue_type' => $type->id,
                        'maintainer_id' => $maintainer->user_id,
                        'status' => $mrData['status'],
                        'notes' => $mrData['notes'],
                        'request_date' => Carbon::now()->subDays(rand(1, 30))->toDateString(),
                        'parent_id' => $owner->id,
                    ]
                );
            }
        }
        $this->command->info('   ✅ ' . count($maintenanceRequestsData) . ' maintenance requests created');

        // ============================================
        // 10. CREATE EXPENSES
        // ============================================
        $this->command->info('📌 Creating expenses...');

        $maintenanceExpenseTypeId = $createdTypes['Maintenance']->id;
        $utilitiesExpenseTypeId = $createdTypes['Utilities']->id;

        $expensesData = [
            ['title' => 'Plumbing Repair', 'property_id' => $properties[0]->id, 'unit_id' => $units[0]->id, 'expense_type' => $maintenanceExpenseTypeId, 'amount' => 350, 'notes' => 'Fixed leaking pipes'],
            ['title' => 'Electrical Maintenance', 'property_id' => $properties[0]->id, 'unit_id' => $units[1]->id, 'expense_type' => $maintenanceExpenseTypeId, 'amount' => 500, 'notes' => 'Monthly electrical check'],
            ['title' => 'Water Bill', 'property_id' => $properties[0]->id, 'unit_id' => $units[0]->id, 'expense_type' => $utilitiesExpenseTypeId, 'amount' => 450, 'notes' => 'Monthly water utility'],
            ['title' => 'Landscaping Services', 'property_id' => $properties[2]->id, 'unit_id' => $units[11]->id, 'expense_type' => $maintenanceExpenseTypeId, 'amount' => 300, 'notes' => 'Monthly garden maintenance'],
            ['title' => 'HVAC Repair', 'property_id' => $properties[2]->id, 'unit_id' => $units[12]->id, 'expense_type' => $maintenanceExpenseTypeId, 'amount' => 750, 'notes' => 'AC compressor replacement'],
            ['title' => 'Electricity Bill', 'property_id' => $properties[1]->id, 'unit_id' => $units[6]->id, 'expense_type' => $utilitiesExpenseTypeId, 'amount' => 800, 'notes' => 'Monthly electricity'],
        ];

        foreach ($expensesData as $expData) {
            Expense::firstOrCreate(
                [
                    'title' => $expData['title'],
                    'parent_id' => $owner->id,
                ],
                array_merge($expData, ['parent_id' => $owner->id, 'date' => Carbon::now()->subDays(rand(1, 60))->toDateString()])
            );
        }
        $this->command->info('   ✅ ' . count($expensesData) . ' expenses created');

        // ============================================
        // 11. CREATE CONTACTS
        // ============================================
        $this->command->info('📌 Creating contacts...');

        $contactsData = [
            ['name' => 'ABC Plumbing Services', 'email' => 'contact@abcplumbing.com', 'contact_number' => '(555) 111-2222', 'subject' => 'Emergency Plumbing', 'message' => '24/7 emergency plumbing services'],
            ['name' => 'City Electric Co.', 'email' => 'info@cityelectric.com', 'contact_number' => '(555) 333-4444', 'subject' => 'Electrical Services', 'message' => 'Licensed electricians'],
            ['name' => 'Cool Air HVAC', 'email' => 'service@coolair.com', 'contact_number' => '(555) 555-6666', 'subject' => 'HVAC Services', 'message' => 'Heating and cooling specialists'],
            ['name' => 'Green Garden Landscaping', 'email' => 'hello@greengarden.com', 'contact_number' => '(555) 777-8888', 'subject' => 'Landscaping', 'message' => 'Professional landscaping'],
        ];

        foreach ($contactsData as $contData) {
            Contact::firstOrCreate(
                ['name' => $contData['name'], 'parent_id' => $owner->id],
                array_merge($contData, ['parent_id' => $owner->id])
            );
        }
        $this->command->info('   ✅ ' . count($contactsData) . ' contacts created');

        // ============================================
        // 12. CREATE NOTICE BOARD
        // ============================================
        $this->command->info('📌 Creating notice board posts...');

        $noticesData = [
            ['title' => 'Annual Maintenance Schedule', 'description' => 'Annual maintenance will be conducted next week. Please ensure access to your units.', 'parent_id' => $owner->id],
            ['title' => 'Holiday Hours', 'description' => 'Office will be closed on Memorial Day weekend. For emergencies, call (555) 999-0000.', 'parent_id' => $owner->id],
            ['title' => 'Pool Renovation', 'description' => 'The swimming pool will be closed for renovation from June 1-15.', 'parent_id' => $owner->id],
            ['title' => 'Rent Payment Reminder', 'description' => 'Rent is due by the 5th of each month. Late fee applies after.', 'parent_id' => $owner->id],
            ['title' => 'New Gym Equipment', 'description' => 'New fitness equipment has been installed in the gym. Enjoy!', 'parent_id' => $owner->id],
        ];

        foreach ($noticesData as $noticeData) {
            NoticeBoard::firstOrCreate(
                ['title' => $noticeData['title'], 'parent_id' => $owner->id],
                $noticeData
            );
        }
        $this->command->info('   ✅ ' . count($noticesData) . ' notice board posts created');

        // ============================================
        // 13. CREATE N8N WEBHOOKS
        // ============================================
        $this->command->info('📌 Creating N8n webhooks...');

        $n8nModules = [
            'create_user', 'create_tenant', 'create_maintainer',
            'create_maintenance_request', 'maintenance_request_complete',
            'create_invoice', 'payment_reminder'
        ];

        foreach ($n8nModules as $module) {
            N8n::firstOrCreate(
                ['module' => $module, 'parent_id' => $owner->id],
                [
                    'module' => $module,
                    'method' => 'POST',
                    'url' => 'https://webhook.example.com/' . $module,
                    'status' => 0,
                    'parent_id' => $owner->id,
                ]
            );
        }
        $this->command->info('   ✅ ' . count($n8nModules) . ' N8n webhooks created');

        // ============================================
        // 14. CREATE AMENITIES
        // ============================================
        $this->command->info('📌 Creating amenities...');

        $amenitiesData = [
            ['name' => 'Swimming Pool', 'description' => 'Olympic size pool with jacuzzi', 'parent_id' => $owner->id],
            ['name' => 'Fitness Center', 'description' => '24/7 gym with modern equipment', 'parent_id' => $owner->id],
            ['name' => 'Secure Parking', 'description' => 'Underground parking with security', 'parent_id' => $owner->id],
            ['name' => 'Rooftop Garden', 'description' => 'Community garden with city views', 'parent_id' => $owner->id],
            ['name' => 'Business Center', 'description' => 'Co-working space with high-speed internet', 'parent_id' => $owner->id],
        ];

        foreach ($amenitiesData as $amenityData) {
            Amenity::firstOrCreate(
                ['name' => $amenityData['name'], 'parent_id' => $owner->id],
                $amenityData
            );
        }
        $this->command->info('   ✅ ' . count($amenitiesData) . ' amenities created');

        // ============================================
        // 15. CREATE ADVANTAGES (FIXED - no 'status' column)
        // ============================================
        $this->command->info('📌 Creating advantages...');

        $advantagesData = [
            ['name' => 'Prime Location', 'description' => 'Walking distance to public transit and shopping', 'parent_id' => $owner->id],
            ['name' => 'Energy Efficient', 'description' => 'Solar panels and energy-saving appliances', 'parent_id' => $owner->id],
            ['name' => 'Pet Friendly', 'description' => 'Pets welcome with dog park on site', 'parent_id' => $owner->id],
            ['name' => '24/7 Security', 'description' => 'Gated community with security cameras', 'parent_id' => $owner->id],
        ];

        foreach ($advantagesData as $advantageData) {
            Advantage::firstOrCreate(
                ['name' => $advantageData['name'], 'parent_id' => $owner->id],
                $advantageData
            );
        }
        $this->command->info('   ✅ ' . count($advantagesData) . ' advantages created');

        // ============================================
        // 16. CREATE AGREEMENT (FIXED for your schema)
        // ============================================
               // ============================================
        // 16. CREATE AGREEMENT (FIXED - no agreement_id)
        // ============================================
        $this->command->info('📌 Creating agreement...');

        if (count($properties) > 0 && count($units) > 0) {
            Agreement::firstOrCreate(
                [
                    'property_id' => $properties[0]->id,
                    'unit_id' => $units[0]->id,
                    'parent_id' => $owner->id
                ],
                [
                    'property_id' => $properties[0]->id,
                    'unit_id' => $units[0]->id,
                    'date' => Carbon::now()->toDateString(),
                    'terms_condition' => 'The tenant agrees to maintain the property in good condition. Rent is due on the 1st of each month. Late fee applies after the 5th.',
                    'description' => 'Standard lease agreement for Unit ' . $units[0]->name,
                    'status' => 'active',
                    'attachment' => null,
                    'parent_id' => $owner->id,
                ]
            );
            $this->command->info('   ✅ Agreement created');
        } else {
            $this->command->warn('   ⚠️ Skipping agreement - no properties or units found');
        }

        // ============================================
        // 17. CREATE BLOG POST (FIXED for your schema)
        // ============================================
        $this->command->info('📌 Creating blog post...');

        Blog::firstOrCreate(
            ['title' => 'Tips for First-Time Renters', 'parent_id' => $owner->id],
            [
                'title' => 'Tips for First-Time Renters',
                'slug' => 'tips-for-first-time-renters',
                'content' => 'Looking for your first rental property? Here are 5 tips to help you find the perfect place. 1. Set a budget. 2. Location matters. 3. Check amenities. 4. Read the lease carefully. 5. Ask about maintenance policies.',
                'image' => null,
                'enabled' => 1,
                'parent_id' => $owner->id,
            ]
        );
        $this->command->info('   ✅ Blog post created');

        // ============================================
        // 18. CREATE FAQ (FIXED for your schema)
        // ============================================
        $this->command->info('📌 Creating FAQ...');

        $faqData = [
            ['question' => 'How do I pay my rent online?', 'description' => 'You can pay online through the portal using credit card or bank transfer. Go to Invoices section and click "Pay Now".', 'enabled' => 1, 'parent_id' => $owner->id],
            ['question' => 'How do I submit a maintenance request?', 'description' => 'Go to Maintenance section and click "New Request". Describe the issue and submit. You will receive updates via email.', 'enabled' => 1, 'parent_id' => $owner->id],
            ['question' => 'When is rent due?', 'description' => 'Rent is due on the 1st of each month. A late fee of $50 applies after the 5th.', 'enabled' => 1, 'parent_id' => $owner->id],
            ['question' => 'Can I have pets?', 'description' => 'Some properties allow pets with an additional pet fee. Please check your lease agreement or contact management.', 'enabled' => 1, 'parent_id' => $owner->id],
            ['question' => 'How do I renew my lease?', 'description' => 'Contact the management office 60 days before your lease ends to discuss renewal options.', 'enabled' => 1, 'parent_id' => $owner->id],
        ];

        foreach ($faqData as $faq) {
            FAQ::firstOrCreate(
                ['question' => $faq['question'], 'parent_id' => $owner->id],
                $faq
            );
        }
        $this->command->info('   ✅ ' . count($faqData) . ' FAQ created');

        // ============================================
        // 19. CREATE PAGE (FIXED for your schema)
        // ============================================
        $this->command->info('📌 Creating page...');

        Page::firstOrCreate(
            ['title' => 'About Us', 'parent_id' => $owner->id],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => '<h2>Welcome to Our Property Management System</h2><p>We provide comprehensive property management solutions for property owners and tenants. Our platform makes it easy to manage properties, collect rent, handle maintenance requests, and communicate with tenants.</p><h3>Our Mission</h3><p>To simplify property management through innovative technology and exceptional customer service.</p>',
                'enabled' => 1,
                'parent_id' => $owner->id,
            ]
        );
        $this->command->info('   ✅ Page created');

        // ============================================
        // 20. CREATE COUPON (FIXED for your schema)
        // ============================================
               // ============================================
        // 20. CREATE COUPON (FIXED - no parent_id)
        // ============================================
        $this->command->info('📌 Creating coupon...');

        Coupon::firstOrCreate(
            ['code' => 'WELCOME20'],
            [
                'name' => 'Welcome Discount',
                'type' => 'percentage',
                'rate' => 20.00,
                'applicable_packages' => 'all',
                'code' => 'WELCOME20',
                'valid_for' => Carbon::now()->addMonths(3)->toDateString(),
                'use_limit' => 100,
                'status' => 1,
            ]
        );
        $this->command->info('   ✅ Coupon created');

        // ============================================
        // 21. CREATE HOME PAGE (Optional)
        // ============================================
        $this->command->info('📌 Creating home page sections...');

        // Check if home page sections already exist
        if (HomePage::where('parent_id', $owner->id)->count() == 0) {
            $homeSections = [
                ['title' => 'Banner', 'section' => 'Section 1', 'content' => null, 'content_value' => '{"title":"Welcome to Our Property Management","subtitle":"Find your dream home today"}', 'enabled' => 1, 'parent_id' => $owner->id],
                ['title' => 'Features', 'section' => 'Section 2', 'content' => null, 'content_value' => '{"feature1":"Easy Management","feature2":"24/7 Support"}', 'enabled' => 1, 'parent_id' => $owner->id],
            ];

            foreach ($homeSections as $section) {
                HomePage::create($section);
            }
            $this->command->info('   ✅ ' . count($homeSections) . ' home page sections created');
        } else {
            $this->command->info('   ⚠️ Home page sections already exist');
        }

        // ============================================
        // SUMMARY
        // ============================================
        $this->command->info('==========================================');
        $this->command->info('🎉 COMPLETE TEST DATA SEEDER COMPLETED!');
        $this->command->info('==========================================');
        $this->command->info('');
        $this->command->info('📊 FINAL SUMMARY:');
        $this->command->info('   - Types: ' . count($typeData));
        $this->command->info('   - Properties: ' . count($properties));
        $this->command->info('   - Units: ' . count($units));
        $this->command->info('   - Tenants: ' . count($tenants));
        $this->command->info('   - Maintainers: ' . count($maintainers));
        $this->command->info('   - Invoices: ' . count($invoices));
        $this->command->info('   - Invoice Items: ' . count($invoiceItemsData));
        $this->command->info('   - Invoice Payments: ' . count($paymentsData));
        $this->command->info('   - Maintenance Requests: ' . count($maintenanceRequestsData));
        $this->command->info('   - Expenses: ' . count($expensesData));
        $this->command->info('   - Contacts: ' . count($contactsData));
        $this->command->info('   - Notice Board: ' . count($noticesData));
        $this->command->info('   - N8n Webhooks: ' . count($n8nModules));
        $this->command->info('   - Amenities: ' . count($amenitiesData));
        $this->command->info('   - Advantages: ' . count($advantagesData));
        $this->command->info('   - FAQ: ' . count($faqData));
        $this->command->info('   - Blog: 1');
        $this->command->info('   - Page: 1');
        $this->command->info('   - Coupon: 1');
        $this->command->info('   - Agreement: 1');
        $this->command->info('');
        $this->command->info('🔑 LOGIN CREDENTIALS:');
        $this->command->info('   Super Admin:  superadmin@gmail.com  |  123456');
        $this->command->info('   Owner:        owner@gmail.com        |  123456');
        $this->command->info('   Manager:      manager@gmail.com      |  123456');
        $this->command->info('   Tenant:       tenant@gmail.com       |  123456');
        $this->command->info('   Maintainer:   maintainer@gmail.com   |  123456');
        $this->command->info('');
        $this->command->info('📝 Additional Test Accounts (password: password):');
        $this->command->info('   Tenants: john.smith@example.com, sarah.johnson@example.com, etc.');
        $this->command->info('   Maintainers: mike@maintainer.com, david@maintainer.com');
        $this->command->info('==========================================');
    }
}
