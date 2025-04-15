<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Adiciona a coluna 'tenant_id' apenas se não existir
        if (!Schema::hasColumn('clientes', 'tenant_id')) {
            Schema::table('clientes', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('advogados', 'tenant_id')) {
            Schema::table('advogados', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('alertas', 'tenant_id')) {
            Schema::table('alertas', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('audiencias', 'tenant_id')) {
            Schema::table('audiencias', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('contracts', 'tenant_id')) {
            Schema::table('contracts', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('documentos', 'tenant_id')) {
            Schema::table('documentos', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('historico_andamento', 'tenant_id')) {
            Schema::table('historico_andamento', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('users', 'tenant_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }

        if (!Schema::hasColumn('processos', 'tenant_id')) {
            Schema::table('processos', function (Blueprint $table) {
                $table->foreignId('tenant_id')->nullable()->constrained('tenants')->after('id');
            });
        }
    }

    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('advogados', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('alertas', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('audiencias', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('historico_andamento', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });

        Schema::table('processos', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');
        });
    }
};
