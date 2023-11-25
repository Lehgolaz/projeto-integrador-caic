import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Index({ auth, paymentmethod }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Payment</h2>}
        >
            <Head title="City" />
            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <payment-method paymentmethod={paymentmethod} />
            </div>
        </AuthenticatedLayout>
    );
}