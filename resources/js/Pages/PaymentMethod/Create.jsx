import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import PaymentMethodForm from './PaymentMethodsForm';

export default function Create({ auth, states }) {
    const { data, setData, post, processing, reset, errors } = useForm({
        name: "",
        state_id: "",
    });

    const submit = (e) => {
        e.preventDefault(); 
        console.log(data)
        post(route("paymen-method.store"), {
            onSuccess: () => {
                reset();
            },
        });
    };

    const cancel = () => {
        if (window.confirm("Are you sure you want to cancel?")) {
            reset();
        }
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Payment</h2>}
        >
            <Head title="Create" />
            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <CityForm
                    data={data}
                    errors={errors}
                    setData={setData}
                    submit={submit}
                    cancel={cancel}
                    processing={processing}
                    states={states}
                />
            </div>
        </AuthenticatedLayout>
    );
}